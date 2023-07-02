import { splitStringByUppercase } from '../utils/utils.mjs';
import { writeFile } from 'fs/promises';
import path from 'path';

const url = `https://api.github.com/users/${process.env.GIT_USER}/repos`;
const projectsPath = path.join(process.cwd(), 'src/config/projects.json');

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
  const response = await fetch(`https://api.github.com/repos/${process.env.GIT_USER}/${project}/languages`);

  if (!response.ok)
      throw new Error(response.statusText);

  const languages = await response.json();

  return languages;
}

const getProjectImageUrl = (project, branch) => {
    return `https://raw.githubusercontent.com/${process.env.GIT_USER}/${project}/${branch}/preview.jpg`
}

const parseProjectsResponse = async (data) => {
  let languages = data.map(project => {
    return getProjectLanguagesByPercentage(project.name, 10)
  })
  languages = await Promise.all(languages)

  return data.map((project, index) => {
    let obj = {};

    jsonApiProps.forEach(apiProp => {
      let value;

      if (apiProp?.callback){
        const props = apiProp.callbackProps?.map(prop => {
          return project[prop]
        });

        value = apiProp.callback(...props)
      }
      else if (apiProp.prop == 'languages') {
        value = languages[index]
      }
      else{
        value = project[apiProp.githubProp];
      }

      obj[apiProp.prop] = value;
    })

    return obj;
  })
}

const jsonApiProps = [
  {
    prop: 'url',
    githubProp: 'html_url',
  },
  {
    prop: 'name',
    callbackProps: ['name'],
    callback: splitStringByUppercase,
  },
  {
    prop: 'description',
    githubProp: 'description',
  },
  {
    prop: 'languages',
    githubProp: 'languages_url',
  },
  {
    prop: 'img',
    callbackProps: ['name', 'default_branch'],
    callback: getProjectImageUrl,
  }
];

pullGithubProjects();