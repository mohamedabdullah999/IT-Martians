<?php

namespace App\Services;

use App\Models\Message;

class MessageManager
{
    public function getAllMessagesForAdmin()
    {
        return Message::latest()->paginate(10);
    }

    public function getUnreadCount(): int
    {
        return Message::where('is_read', false)->count();
    }

    public function getMessageDetails(int $id): ?Message
    {

        $message = Message::find($id);

        if($message && !$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return $message;
    }

    public function deleteMessage(int $id): void
    {
        Message::destroy($id);
    }

    public function storeNewMessage(array $data): Message
    {
        return Message::create($data);
    }
}
