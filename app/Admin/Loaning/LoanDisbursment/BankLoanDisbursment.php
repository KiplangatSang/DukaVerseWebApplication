<?php


namespace App\Loaning\LoanDisbursment;

use App\LoanApplication;
use App\Loans\Loans;
use App\Repositories\Payments\B2CPayments\IpayPayments;
use App\Repositories\Payments\B2CPayments\IpayPaymentsB2C;

abstract class BankLoanDisbursment extends LoanDisbursment
{
    protected $loan, $gateWay, $user, $amount, $status, $date;
    public function __construct($loan, $gateWay, $user, $amount)
    {
        $this->loan = $this->setPaymentName($loan);
        $this->gateWay = $this->setGateWay($gateWay);
        $this->user = $user;
        $this->account = $this->setAccount($user->account);
        $this->amount = $this->setPaymentAmount($amount);
    }

    private function transactMoney()
    {
        $disbursmentData = $this->disburseMoney($this->account, $this->amount);
        if ($disbursmentData) {

            $this->status = $this->setDisbursmentStatus(1);
        } else {
            $this->status = $this->setDisbursmentStatus(0);
        }
        $this->date = $this->setPaymentDate();
        return  $disbursmentData;
    }

    public function disburseMoney($user, $narration)
    {
        $account = $user->account;
        $amount = $user->amount;
        $phone_no = $user->phone_no;
        $narration = $user->narration;
        if ($this->gateWay == "IPAY") {
          return $this->sendMoneyViaIpay($account, $amount, $phone_no, $narration);
        } else {
            return false;
        }
    }

    // Loan disbursment Via IPAY
    private function sendMoneyViaIpay($account, $amount, $phone_no, $narration)
    {
        $ipay = new IpayPaymentsB2C($account, $amount, $phone_no, $narration);
        $params = $ipay->sendMoney();

        if ($params) {
            $url = $ipay->baseUrl . "/pesalink";
            $responseData = $this->makeHttp($url, $params);
            return $responseData;
        } else
            return false;
    }
}
