export default function Link({ children,  href, ...attributes}) {
    return (
        <a href={href} className="" {...attributes}>{children}</a>
    );
}