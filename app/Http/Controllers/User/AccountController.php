<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AccountCreateRequest;
use App\Model\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InstagramAPI\Instagram;
use Mockery\Exception;

class AccountController extends Controller
{
    public function list(Request $request)
    {

        $accounts = Account::where('user_id', getUser('id'))->get();

        try {

            $ig = new \InstagramAPI\Instagram();

            foreach ($accounts as $account) {

                if ($account->pk == '') {
                    $ig->login($account->username, $account->password);

                    $instagram = $ig->account->getCurrentUser()->getUser();

                    Account::where('username', $instagram->getUsername())->update([
                        'pk' => $instagram->getPk(),
                        'full_name' => $instagram->getFullName(),
                        'is_private' => $instagram->getIsPrivate(),
                        'profile_pic_url' => $instagram->getProfilePicUrl(),
                        'biography' => $instagram->getBiography(),
                        'external_url' => $instagram->getExternalLynxUrl(),
                        'phone_number' => $instagram->getPhoneNumber(),
                    ]);
                }

            }
        } catch (\Exception $e) {
            return 'Something went wrong: ' . $e->getMessage() . "\n";

        }

        if ($request->ajax()) {
            try {
                return view('user.account.table', compact('accounts'))->render();
            } catch (\Throwable $e) {
            }
        }

        return view('user.account.list', compact('accounts'));
    }

    public function create(AccountCreateRequest $request)
    {
        try {
            $ig = new \InstagramAPI\Instagram();
            $ig->login($request->username, $request->password);


            $instagram = $ig->account->getCurrentUser()->getUser();

          $account = Account::create([
              'user_id' => getUser('id'),
              'pk' => $instagram->getPk(),
              'username' => $instagram->getUsername(),
              'password' => $request->password,
              'full_name' => $instagram->getFullName(),
              'is_private' => $instagram->getIsPrivate(),
              'profile_pic_url' => $instagram->getProfilePicUrl(),
              'biography' => $instagram->getBiography(),
              'external_url' => $instagram->getExternalLynxUrl(),
              'phone_number' => $instagram->getPhoneNumber(),
          ]);
        } catch (Exception $exception) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1, 'data' => $account]);

    }
}
