<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $job->name }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $job->label }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{ route('jobs.edit', $job) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <form class="deleteForm" action="{{ route('jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-indigo-600 hover:text-indigo-900">
                {{ __('Delete') }}
            </button>
        </form>
    </td>
</tr>
