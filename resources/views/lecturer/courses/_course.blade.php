<tr>
  <td>
    <a href="{{ route('lecturer::course.show', $course->id) }}">
      {{ $course->id }}
    </a>
  </td>
  <td>{{ $course->name }}</td>
  <td>{{ $course->description }}</td>
  <td>{{ $course->language }}</td>
  <td>
    <a href="{{ route('lecturer::course.edit', $course->id) }}">
      Edit
    </a>
    @include('lecturer.courses._delete')
  </td>
</tr>
