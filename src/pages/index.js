import Repositories from "@/components/Repositories";

export const getStaticProps = async () => {
    const url = `https://api.github.com/users/${process.env.GITHUB_USERNAME}/repos`;

    const response = await fetch(url);

    if (!response.ok)
        throw new Error('Failed to fetch projects')

    const repos = await response.json();

    return { props: { repos } }
}

export default function Index({ repos }) {
    return (
        <>
            <a href="#about" >
                Disables scrolling to the top
            </a>


            <section id="about">
                <Repositories repos={repos} />
            </section>
        </>
    )
}