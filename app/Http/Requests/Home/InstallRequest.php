<?php

namespace App\Http\Requests\Home;

use App\Helpers\Constant;
use App\Http\Requests\ApiRequest;
use App\Http\Resources\Api\Home\AdvertisementResource;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\CityResource;
use App\Http\Resources\Api\Home\FaqResource;
use App\Http\Resources\Api\Home\SubscriptionResource;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\Subscription;
use App\Traits\ResponseTrait;

class InstallRequest extends ApiRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    public function run()
    {
        $data = [];
        $data['Settings'] = Setting::pluck((app()->getLocale() =='en')?'value':'value_ar','key')->toArray();
       //$data['Subscriptions'] = SubscriptionResource::collection(Subscription::where('is_active',true)->get());
        $data['Categories'] = 'categories';
        $data['Cities'] = 'jaddah';
        $data['Advertisements'] = 'adds';
        /*$data['Essentials'] = [
            'TicketsStatus'=>Constant::TICKETS_STATUS,
            'NotificationType'=>Constant::NOTIFICATION_TYPE,
            'SenderType'=>Constant::SENDER_TYPE,
            'VerificationType'=>Constant::VERIFICATION_TYPE,
            'SubscriptionStatuses'=>Constant::SUBSCRIPTION_STATUSES,
            'SubscriptionTypes'=>Constant::SUBSCRIPTION_TYPES,
            'PaymentMethod'=>Constant::PAYMENT_METHOD,
            'TransactionStatus'=>Constant::TRANSACTION_STATUS,
            'TransactionTypes'=>Constant::TRANSACTION_TYPES,
            'UserTypes'=>Constant::USER_TYPE,
            'ProviderTypes'=>Constant::PROVIDER_TYPE,
            'OrderStatuses'=>Constant::ORDER_STATUSES,
            'ReviewType'=>Constant::REVIEW_TYPE,
            'AdvertisementType'=>Constant::ADVERTISEMENT_TYPE,
            'FavouriteType'=>Constant::FAVOURITE_TYPE,
        ];*/
        return $this->successJsonResponse([],$data);
    }
}
