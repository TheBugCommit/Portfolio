export default function Repositories({ repos }) {
  return (
    <ul>
      {repos.map((repo) => (
          <li key={repo.id}>
              {repo.name}
          </li>
        ))}
    </ul>
  );
}