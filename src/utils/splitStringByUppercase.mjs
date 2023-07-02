const splitStringByUppercase = (string) => {
    return string.split(/(?=[A-Z])/).join(" ");
}

export default splitStringByUppercase;