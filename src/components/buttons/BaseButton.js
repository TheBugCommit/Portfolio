export default function BaseButton ({ children, ...attributes }) {
    return (
        <button
            type="button"
            className=""
            {...attributes}
        >
            {children}
        </button>
    );
}