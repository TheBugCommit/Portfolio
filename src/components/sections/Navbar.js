import navJSON from '@/config/nav'
import Link from "@/components/links/Link";
import styles from '@/styles/modules/Navbar.module.scss'

function NavItem({ children, href, title }) {
    return (
        <li>
            <Link href={href} title={title}>
                {children}
            </Link>
        </li>
    );
}

export default function Navbar() {
    return (
        <>
            <input className={styles.menuIcon} type="checkbox" id="menu-icon-check" name="menu-icon" />
            <label htmlFor="menu-icon-check"></label>
            <nav role='navigation' className={styles.nav}>
                <ul>
                    {navJSON.map(navItem =>
                        <NavItem key={navItem.id} href={navItem.id} title={navItem.name}>
                            {navItem.name}
                        </NavItem>
                    )}
                </ul>
            </nav>
        </>
    )
}