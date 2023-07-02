import heroJSON from '@/config/hero'
import SocialButton from '../buttons/SocialButton';

export default function Hero() {
    const birthYear = new Date(heroJSON.birth).getFullYear();
    const actualYear = new Date().getFullYear();

    const age = actualYear - birthYear;
    const name = heroJSON.name;
    const img = heroJSON.img;
    const social = heroJSON.social;

    return (
        <div>
            <div></div>
            <div>
                <div>
                    {social.map(sn => {
                        return (
                            <SocialButton key={sn.name} title={sn.name} onClick={() => console.info(sn.link)}>
                                {sn.name}
                            </SocialButton>
                        )
                    })}
                </div>
            </div>
        </div>
    )
}