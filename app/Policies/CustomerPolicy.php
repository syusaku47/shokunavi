<?php

namespace App\Policies;

use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the customer can view any customers.
     *
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function viewAny(Customer $customer)
    {
        //
    }

    /**
     * Determine whether the customer can view the customer.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function view(Customer $customer, Customer $model)
    {
        return $customer->id == $model->id;
    }

    /**
     * Determine whether the customer can create customers.
     *
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function create(Customer $model)
    {
        //
    }

    /**
     * Determine whether the customer can update the customer.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function update(Customer $customer, Customer $model)
    {
        return $customer->id == $model->id;
    }

    /**
     * Determine whether the customer can delete the customer.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function delete(Customer $customer, Customer $model)
    {
        return $customer->id == $model->id;
    }

    /**
     * Determine whether the customer can restore the customer.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function restore(Customer $customer, Customer $model)
    {
        //
    }

    /**
     * Determine whether the customer can permanently delete the customer.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function forceDelete(Customer $customer, Customer $model)
    {
        //
    }
}
