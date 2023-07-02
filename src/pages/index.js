import Projects from '@/components/sections/Projects'
import Skills from '@/components/sections/Skills'
import About from '@/components/sections/About'
import Hero from '@/components/sections/Hero'
import Head from 'next/head'

export default function Index() {
    return (
        <>
            <Head>
                <title>GCS Portfolio</title>
                <meta name="description" content="GCS Portfolio" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="icon" href="/favicon.ico" />
            </Head>
            <div>
                <Hero />
                <About />
                <Skills />
                <Projects />
            </div>
        </>
    )
}