<?php
    namespace App\Traits;
    use App\Models\Account;
    use App\Models\Level;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    trait LevelUp{
        public function canLevelUp($account_id){
            $account = Account::find($account_id);;
            $level = Level::find($account->level_id);


            while($account->experience >= $level->experience_needed){
                $excess_experience = $account->experience - $level->experience_needed;
                $account->level_id++;
                $account->experience = 0;
                $account->experience = $excess_experience;
                $account->save();
                $level = Level::where('level_id',$account->level_id)->get();
                dd($level);
                $level->save();
            }
        }
    }
?>
