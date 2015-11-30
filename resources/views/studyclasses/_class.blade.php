<tr>
  <td>
    <a href="{{ route('class.show', array($course->id, $class->id)) }}">
      {{ $class->id }}
    </a>
  </td>
  <td>{{ $class->name }}</td>
  <td>{{ $class->description }}</td>
  <td>{{ $class->type }}</td>
  <td>
    {{ $class->semester_id }}
  </td>
  @if (auth()->user()->isLecturer())
    <td>
      <a href="{{ route('class.edit', array($course->id, $class->id)) }}">
        {{ trans('layout.button.action.edit') }}
      </a>
      @include('studyclasses._delete')
    </td>
  @endif
</tr>
