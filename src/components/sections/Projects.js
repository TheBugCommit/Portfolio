import Image from 'next/image'
import projectsJSON from '@/config/projects'

function Project({ url, name, description, languages, img }) {
  return (
    <div data-url={url}>
      <h1>{name}</h1>
      <p>{description}</p>
      <ul>
        {Object.entries(languages).map((entry, index) => <li key={index}>{entry[0]} : {entry[1]}</li>)}
      </ul>
      <Image src={img} width={100} height={100} alt={`Project ${name} preview`}/>
    </div>
  );
}

export default function Projects() {
  return (
    <>
      {projectsJSON.map(project => <Project key={project.name} {...project}/> )}
    </>
  );
}