/** @type {import('next').NextConfig} */
const nextConfig = {
    env : {
        GITHUB: {
            USERNAME: 'TheBugCommit',
            API: 'https://api.github.com/',
        }
    },
    images: {
        remotePatterns: [
          {
            protocol: 'https',
            hostname: 'raw.githubusercontent.com',
            port: '',
            pathname: '/TheBugCommit/**',
          },
          {
            protocol: 'https',
            hostname: 'picsum.photos',
            port: '',
            pathname: '**',
          },
        ],
      },
}

module.exports = nextConfig
