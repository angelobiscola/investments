Click here to reset your password: <a href="{{ $link = url('collaborator/auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
