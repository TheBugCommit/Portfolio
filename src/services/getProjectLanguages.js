const getProjectLanguages = async (project) => {
    const url = `${process.env.GITHUB.API}repos/${process.env.GITHUB.USERNAME}/${project}/languages`;

    const response = await fetch(url);

    if (!response.ok)
        throw new Error(response.statusText);

    const languages = await response.json();

    return languages;
}

export default getProjectLanguages;