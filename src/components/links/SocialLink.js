import Link from "./Link"

export default function SocialLink ({children, href, title}) {
    return (
        <Link className="" target="_blank" href={href}  title={title}>
            {children}
        </Link>
    )
}