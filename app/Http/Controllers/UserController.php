<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public $users = [
        ['name' => 'John Doe', 'age' => '24', 'gender' => 'male', 'degree' => 'B.S'],
        ['name' => 'John Doe', 'age' => '24', 'gender' => 'male', 'degree' => 'B.S'],
        ['name' => 'Jane Smith', 'age' => '28', 'gender' => 'female', 'degree' => 'M.S'],
        ['name' => 'Alice Johnson', 'age' => '30', 'gender' => 'female', 'degree' => 'Ph.D'],
        ['name' => 'Bob Brown', 'age' => '22', 'gender' => 'male', 'degree' => 'B.A'],
        ['name' => 'Charlie Davis', 'age' => '26', 'gender' => 'male', 'degree' => 'M.A'],
        ['name' => 'Diana Clark', 'age' => '27', 'gender' => 'female', 'degree' => 'B.Sc'],
        ['name' => 'Edward Lopez', 'age' => '29', 'gender' => 'male', 'degree' => 'M.Sc'],
        ['name' => 'Fiona Wilson', 'age' => '31', 'gender' => 'female', 'degree' => 'M.B.A'],
        ['name' => 'George Martinez', 'age' => '25', 'gender' => 'male', 'degree' => 'B.Com'],
        ['name' => 'Hannah White', 'age' => '23', 'gender' => 'female', 'degree' => 'B.Ed'],
        ['name' => 'Ian Thompson', 'age' => '32', 'gender' => 'male', 'degree' => 'M.Ed'],
        ['name' => 'Julia Lee', 'age' => '33', 'gender' => 'female', 'degree' => 'LL.B'],
        ['name' => 'Kevin Hall', 'age' => '21', 'gender' => 'male', 'degree' => 'B.Tech'],
        ['name' => 'Laura King', 'age' => '34', 'gender' => 'female', 'degree' => 'M.Tech'],
        ['name' => 'Mike Scott', 'age' => '35', 'gender' => 'male', 'degree' => 'B.Arch'],
        ['name' => 'Nina Green', 'age' => '36', 'gender' => 'female', 'degree' => 'M.Arch'],
        ['name' => 'Oscar Young', 'age' => '37', 'gender' => 'male', 'degree' => 'BFA'],
        ['name' => 'Pamela Adams', 'age' => '38', 'gender' => 'female', 'degree' => 'MFA'],
        ['name' => 'Quentin Baker', 'age' => '39', 'gender' => 'male', 'degree' => 'BCA'],
        ['name' => 'Rachel Harris', 'age' => '40', 'gender' => 'female', 'degree' => 'MCA']
    ];
    

    public function users()
    {
        return Inertia::render('Users', ['content' => $this->users]);
    }

    public function getUser(Request $request)
    {
        $query = $request->input('search');
        $arrayFilteredUsers = array();
        if ($query) {
            $filteredUsers = array_filter($this->users, function ($user) use ($query) {
                return stripos($user['name'], $query) !== false ||
                       stripos($user['age'], $query) !== false ||
                       stripos($user['degree'], $query) !== false;
            });
            
        } else {
            $filteredUsers = $this->users;
        }

        return response()->json(['content' => $filteredUsers]);

    }
    
}
