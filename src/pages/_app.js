import 'normalize.css/normalize.css';
import '@/styles/main.scss';
import Layout from '@/components/Layout';
import { montserrat } from '@/fonts';

//import "@fortawesome/fontawesome-svg-core/styles.css"; 
//import { config } from "@fortawesome/fontawesome-svg-core";
//config.autoAddCss = false; 

export default function App({ Component, pageProps }) {
  return (
    <Layout className={montserrat.className}>
      <Component {...pageProps} />
    </Layout>
  );
}