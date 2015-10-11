<tr>
  <td>
    <a href="{{ route('admin::semester.show', $semester->id) }}">
      {{ $semester->id }}
    </a>
  </td>
  <td>
    <a href="{{ route('admin::semester.edit', $semester->id) }}">
      {{ trans('layout.button.action.edit') }}
    </a>
    @include('admin.semesters._delete')
  </td>
</tr>
