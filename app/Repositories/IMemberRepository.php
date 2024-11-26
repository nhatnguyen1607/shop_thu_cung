<?php

namespace App\Repositories;

interface IMemberRepository
{
    public function allMembers();
    public function findMember($id);
    public function updateMember(array $data, $id);

}
