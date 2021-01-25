<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AccountsSearchCriteriaType
 *
 * 
 * XSD Type: AccountsSearchCriteria
 */
class AccountsSearchCriteriaType extends CompaniesSearchCriteriaType
{

    /**
     * @var string $accountClassGroup
     */
    private $accountClassGroup = null;

    /**
     * @var string[] $accountClasses
     */
    private $accountClasses = null;

    /**
     * @var string[] $accounts
     */
    private $accounts = null;

    /**
     * @var bool $omitAccountsWithNoActivity
     */
    private $omitAccountsWithNoActivity = null;

    /**
     * Gets as accountClassGroup
     *
     * @return string
     */
    public function getAccountClassGroup()
    {
        return $this->accountClassGroup;
    }

    /**
     * Sets a new accountClassGroup
     *
     * @param string $accountClassGroup
     * @return self
     */
    public function setAccountClassGroup($accountClassGroup)
    {
        $this->accountClassGroup = $accountClassGroup;
        return $this;
    }

    /**
     * Adds as accountClassType
     *
     * @return self
     * @param string $accountClassType
     */
    public function addToAccountClasses($accountClassType)
    {
        $this->accountClasses[] = $accountClassType;
        return $this;
    }

    /**
     * isset accountClasses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAccountClasses($index)
    {
        return isset($this->accountClasses[$index]);
    }

    /**
     * unset accountClasses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAccountClasses($index)
    {
        unset($this->accountClasses[$index]);
    }

    /**
     * Gets as accountClasses
     *
     * @return string[]
     */
    public function getAccountClasses()
    {
        return $this->accountClasses;
    }

    /**
     * Sets a new accountClasses
     *
     * @param string $accountClasses
     * @return self
     */
    public function setAccountClasses(array $accountClasses)
    {
        $this->accountClasses = $accountClasses;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToAccounts($string)
    {
        $this->accounts[] = $string;
        return $this;
    }

    /**
     * isset accounts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAccounts($index)
    {
        return isset($this->accounts[$index]);
    }

    /**
     * unset accounts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAccounts($index)
    {
        unset($this->accounts[$index]);
    }

    /**
     * Gets as accounts
     *
     * @return string[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Sets a new accounts
     *
     * @param string[] $accounts
     * @return self
     */
    public function setAccounts(array $accounts)
    {
        $this->accounts = $accounts;
        return $this;
    }

    /**
     * Gets as omitAccountsWithNoActivity
     *
     * @return bool
     */
    public function getOmitAccountsWithNoActivity()
    {
        return $this->omitAccountsWithNoActivity;
    }

    /**
     * Sets a new omitAccountsWithNoActivity
     *
     * @param bool $omitAccountsWithNoActivity
     * @return self
     */
    public function setOmitAccountsWithNoActivity($omitAccountsWithNoActivity)
    {
        $this->omitAccountsWithNoActivity = $omitAccountsWithNoActivity;
        return $this;
    }


}

