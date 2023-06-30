import { splitStringByUppercase } from '../utils/utils.mjs';
import { writeFile } from 'fs/promises';
import path from 'path';

const url = 'https://api.github.com/users/TheBugCommit/repos';
const projectsPath = path.join(process.cwd(), 'data/projects.json');

const pullGithubProjects = async () => {
  try {
    const response = await fetch(url);

    if (!response.ok)
      throw new Error(response.statusText)

    const projects = await parseProjectsResponse(await response.json());

    await writeFile(projectsPath, JSON.stringify(projects, null, 2));
    
    console.info("Projects updated succefully!!🚀");
    console.dir(projects)
  } catch (error) {
    console.trace(error)
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

const getProjectLanguages = async (project) => {
  const response = await fetch(`https://api.github.com/repos/TheBugCommit/${project}/languages`);

  if (!response.ok)
      throw new Error(response.statusText);

  const languages = await response.json();

  return languages;
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

pullGithubProjects();