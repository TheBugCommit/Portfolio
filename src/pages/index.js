import Project from '@/components/Project'
import projects from '../../data/projects.json'

export default function Index() {
    return (
        <>
            <section id="about">
                <ul>
                    {
                        projects.map((proj) =>
                            <Project key={proj.name} value={proj} />
                        )
                    }
                </ul>
            </section>
        </>
    )
}