import { splitStringByUppercase } from '@/utils/utils';
import getProjectLanguages from '../../services/getProjectLanguages';
import { writeFile } from 'fs/promises';
import path from 'path';

const url = `${process.env.GITHUB.API}users/${process.env.GITHUB.USERNAME}/repos`;
const projectsPath = path.join(process.cwd(), 'data/projects.json');

const pullGithubProjects = async (req, res) => {
  try {
    if (req.method !== 'PATCH')
      throw new Error(`Method ${req.method} isn't supported`);

    const response = await fetch(url);

    if (!response.ok)
      throw new Error(response.statusText)

    const projects = await parseProjectsResponse(await response.json());

    await writeFile(projectsPath, JSON.stringify(projects, null, 2))

    res.send({
      message: 'Projects refreshed succesfully',
    });
  } catch (error) {
    res.status(500).send({
      message: error.message,
    })
  }
};

const getProjectLanguagesByPercentage = async (project, minPercentage) => {
  const languages = await getProjectLanguages(project);
  const entries = Object.entries(languages);

  let byteSum = 0;
  for (const [key, value] of entries) {
    byteSum += value
  }

  let filteredLanguages = {}
  for (const [key, value] of entries) {
    const percentage = Math.round((value * 100) / byteSum);

    if (percentage >= minPercentage)
      filteredLanguages[key] = percentage
  }

  return filteredLanguages;
}

const parseProjectsResponse = async (data) => {
  const jsonApiProps = [
    {
      prop: 'url',
      githubProp: 'html_url',
    },
    {
      prop: 'name',
      githubProp: 'name',
      callback: splitStringByUppercase,
    },
    {
      prop: 'description',
      githubProp: 'description',
    },
    {
      prop: 'languages',
      githubProp: 'languages_url',
    }
  ];


  let languages = data.map(project => {
    return getProjectLanguagesByPercentage(project.name, 5)
  })
  languages = await Promise.all(languages)

  return data.map((project, index) => {
    let obj = {};

    jsonApiProps.forEach(apiProp => {
      let value;

      if (apiProp?.callback)
        value = apiProp.callback(project[apiProp.githubProp])
      else if (apiProp.prop == 'languages') {
        value = languages[index]
      }
      else
        value = project[apiProp.githubProp];

      obj[apiProp.prop] = value;
    })

    return obj;
  })
}

export default pullGithubProjects;
