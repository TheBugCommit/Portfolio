import Navbar from '@/components/sections/Navbar';
import Footer from '@/components/sections/Footer';
import styles from '@/styles/modules/Layout.module.scss';

const Layout = ({ children, className }) => {
    return (
        <div className={`${className} ${styles.wrapper}`}>
            <header className={styles.nav}>
                <Navbar />
            </header>
            <main className={`scrollable ${styles.wrapperInner}`}>
                {children}
            </main>

            <Footer />
        </div>
    )
}

export default Layout;