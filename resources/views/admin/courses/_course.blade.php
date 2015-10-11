<tr>
  <td>
    <a href="{{ route('admin::course.show', $course->id) }}">
      {{ $course->id }}
    </a>
  </td>
  <td>{{ $course->name }}</td>
  <td>{{ $course->description }}</td>
  <td>{{ $course->language }}</td>
  <td>
    <a href="{{ route('admin::course.edit', $course->id) }}">
      {{ trans('layout.button.action.edit') }}
    </a>
    @include('admin.courses._delete')
  </td>
</tr>
