<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">All Users {{ $userSearch }}</h4>
                </div>
                <div class="col-4">
                    <input wire:model.live="userSearch" type="text" class="form-control" placeholder="Search users">
                </div>
            </div>
            
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th wire:click="sortUserList('name', 'asc')">Name</th>
                        <th wire:click="sortUserList('email', 'asc')">Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->profile->role->name ?? 'N/A' }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</div>
