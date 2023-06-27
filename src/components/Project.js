import Link from "next/link";

export default function Project({ value }) {
  
  return (
      <li>
          <a href={value.url}> {value.name} </a>
      </li>
  );
}