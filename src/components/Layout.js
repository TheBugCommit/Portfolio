import Navbar from '@/components/sections/nav/Navbar';
import Footer from '@/components/sections/Footer';

const Layout = ({ children }) => {
    return (
        <>
            <Navbar />
            <main>{children}</main>
            <Footer />
        </>
    )
}

export default Layout;