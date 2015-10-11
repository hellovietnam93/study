<tr>
  <td>
    <a href="{{ route('member::class.show', array($course->id, $class->id)) }}">
      {{ $class->id }}
    </a>
  </td>
  <td>{{ $class->name }}</td>
  <td>{{ $class->description }}</td>
  <td>{{ $class->type }}</td>
  <td>{{ $class->semester }}</td>
</tr>
