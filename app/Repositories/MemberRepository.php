<?php

namespace App\Repositories;

use App\Models\Khachhang;

class MemberRepository implements IMemberRepository
{
    public function allMembers()
    {
        return Khachhang::all();
    }

    public function findMember($id)
    {
        return Khachhang::findOrFail($id);
    }

    public function updateMember(array $data, $id)
    {
        $member = Khachhang::findOrFail($id);
        $member->update($data);
        return $member;
    }
}
