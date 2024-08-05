<tr>
    <td class="px-6 py-4 whitespace-nowrap">{{$user->name}}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
    </td>
    @if (auth()->user()->getRoleNames()->contains('admin'))
        <td class="px-6 py-4 flex items-center gap-5">
            <livewire:user.update :user="$user">
            <livewire:dashboard.delete-users :user="$user">
        </td>
    @endif
</tr>