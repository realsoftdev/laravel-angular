<?php namespace App\Policies;

use App\User;
use App\CannedReply;
use Illuminate\Auth\Access\HandlesAuthorization;

class CannedReplyPolicy
{
    use HandlesAuthorization;

    public function index(User $user) {
        return $user->hasPermission('canned_replies.view');
    }

    public function store(User $user) {
        return $user->hasPermission('canned_replies.create');
    }

    public function update(User $user, CannedReply $reply) {
        return $user->hasPermission('canned_replies.update') || $user->id === $reply->user_id;
    }

    public function destroy(User $user) {
        return $user->hasPermission('canned_replies.delete');
    }
}
