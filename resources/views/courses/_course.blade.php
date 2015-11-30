<tr>
  <td>
    <a href="{{ route('course.show', $course->id) }}">
      {{ $course->id }}
    </a>
  </td>
  <td>{{ $course->name }}</td>
  <td>{{ $course->description }}</td>
  <td>{{ $course->language }}</td>
</tr>
