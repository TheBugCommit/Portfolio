export default function Button({ children, ...attributes }) {
    return (
        <button
            type="button"
            className=""
            {...attributes}
        >
            <div>
                <span>{children}</span>
            </div>
            <div></div>
        </button>
    );
}