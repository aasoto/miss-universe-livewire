<?php

namespace App\Http\Livewire\Dashboard\Editions\Withdrawals;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'edition_id', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $countries, $editions;

    public $country_id, $edition_id;

    public $columns = [
        'id' => 'ID',
        '' => 'Año',
        'edition_id' => 'Edición',
        'country_id' => 'País'
    ];

    public $confirmingDeleteWithdrawal, $withdrawalToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $withdrawals = Withdrawal::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $withdrawals->where('country_id', $this->country_id);
        }

        if ($this->edition_id) {
            $withdrawals->where('edition_id', $this->edition_id);
        }

        $withdrawals = $withdrawals->paginate($this->pagination);
        return view('livewire.dashboard.editions.withdrawals.index', compact('withdrawals'));
    }

    public function selectedWithdrawalToDelete(Withdrawal $withdrawal)
    {
        $this->confirmingDeleteWithdrawal = true;
        $this->withdrawalToDelete = $withdrawal;
    }

    public function delete()
    {
        $this->confirmingDeleteWithdrawal = false;
        $this->withdrawalToDelete->delete();
        $this->emit('deleted');
    }
}
