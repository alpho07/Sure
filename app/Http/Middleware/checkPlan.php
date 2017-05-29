<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Subscriptions;


class checkPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

            //Get current subscription plan for the logged in user
            $sub = new Subscriptions();
            $subscription = $sub->checkCurrentSubscription(Auth::id());

            //Examine and die
            //dd($subscription);

            //Check returned subscription plan
            if($subscription){
                if($subscription->trial_end_date < date('Y-m-d')){  
                    if($subscription->trial_notices < 1){
                        if($subscription->approved != 1 ){
                            return redirect('caveats')->with('message', 'Publication pending subscription approval. Contact Admin');
                        }
                        else{
                            if($subscription->end_date<date('Y-m-d')){
                                return redirect('plans')->with('message', 'Your subscription has expired.Please renew it to publish.');
                            }    
                        }
                    }
                }  
            }

           return redirect('plans')->with('message', 'To publish this caveat, select a plan first.');

        return $next($request);
    }
}
