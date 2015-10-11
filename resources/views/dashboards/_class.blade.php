<tr>
  <td>
    <a href="{{ route('class.show', array($class->course->id, $class->id)) }}">
      {{ $class->id }}
    </a>
  </td>
  <td>{{ $class->name }}</td>
  <td>{{ $class->description }}</td>
  <td>{{ $class->type }}</td>
  <td>{{ $class->semester_id }}</td>
</tr>
