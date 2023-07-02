import BaseButton from "@/components/buttons/BaseButton";

export default function SocialButton ({children, onClick, title}) {
    return (
        <BaseButton className="" onClick={onClick} title={title}>
            {children}
        </BaseButton>
    )
}