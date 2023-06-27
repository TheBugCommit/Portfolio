const splitStringByUppercase = (string) => {
    return string.match(/[A-Z][a-z]+|[0-9]+/g).join(" ");
}

export default splitStringByUppercase;