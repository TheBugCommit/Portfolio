/** @type {import('next').NextConfig} */
const nextConfig = {
    env : {
        GITHUB: {
            USERNAME: 'TheBugCommit',
            API: 'https://api.github.com/',
        }
    },
}

module.exports = nextConfig
