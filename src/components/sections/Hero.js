import Image from 'next/image';
import heroJSON from '@/config/hero'
import Button from '../buttons/Button';
import SocialLink from '../links/SocialLink';
import styles from '@/styles/modules/Hero.module.scss'

export default function Hero() {
    const { name, profesion, img, social, birth, location, email } = heroJSON;

    return (
        <>
            <div>
                <Image src={img} width={200} height={200} alt='Profile picture' />
            </div>
            <div>

                <div className={styles.name}>
                    <span>&gt;&nbsp;</span><h1 className="writing">{name}</h1>
                </div>
                <p>{profesion}</p>
                <div>
                    {social.map(sn => {
                        return (
                            <SocialLink key={sn.name} href={sn.link} title={sn.name}>
                                {sn.name}
                            </SocialLink>
                        )
                    })}
                </div>
                <div>
                    <div></div>
                </div>
                <Button>
                    <span>Download CV</span>
                </Button>
            </div>
        </>
    )
}