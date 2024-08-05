<tr>
    <td class="px-6 py-4 whitespace-nowrap">{{$course->name}}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
    </td>
    @if (auth()->user()->getRoleNames()->contains('admin'))
        <td class="px-6 py-4 flex items-center gap-5">
            <a href="{{route('courses.edit',$course->name)}}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</a>
            <livewire:courses.delete-course :course="$course">
        </td>
    @endif
</tr>