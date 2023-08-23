<?php

namespace App\Models\Forms;

use App\Repositories\OutsideCompanyMember\OutsideCompanyMemberRepositoryInterface;
use App\Repositories\TeamMember\TeamMemberRepositoryInterface;
use App\Services\OutsideCompanyMemberService;
use App\Strategies\TeamMember\TeamMemberTypeStrategy;

class TextField implements FormInterface
{
    /**
     * 1 - label
     * 2- value
     * 3- placeholder
     *
     */
    const MEMBERABLE_TYPE = "App\Models\OutsideCompanyMember";
    const TYPE = "Outside Company";


    private mixed $teamMemberRepository;
    private mixed $outsideCompanyMemberService;

    public function __construct()
    {
        $this->teamMemberRepository = app()->make(TeamMemberRepositoryInterface::class);
        $this->outsideCompanyMemberService = app()->make(OutsideCompanyMemberService::class);
    }

    /**
     * @return array
     */
    public function getDynamicForm(): array
    {
        return [
            [
                "type" => self::TEXT,
                "label" => trans('teams.first_name'),
                "name" => self::FIRST_NAME,
                "placeholder" => trans('teams.enter_first_name'),
            ],
            [
                "type" => self::TEXT,
                "label" => trans('teams.last_name'),
                "name" => self::LAST_NAME,
                "placeholder" => trans('teams.enter_last_name'),
            ]   ,
            [
                "type" => self::TEXT,
                "label" => trans('teams.email'),
                "name" => self::EMAIL,
                "placeholder" => trans('teams.enter_email'),
            ] ,
            [
                "type" => self::TEXT,
                "label" => trans('teams.phone'),
                "name" => self::PHONE,
                "placeholder" => trans('teams.enter_phone'),
            ]
        ];
    }
    /**
     * @param $data
     * @param $teamId
     * @return void
     */
    public function store($data, $teamId): void
    {
        $data['team_id'] = $teamId;
        $outsideCompanyMember = $this->outsideCompanyMemberService->create($data);
        $prepareData = [];
        $prepareData['team_id'] = $teamId;
        $prepareData['memberable_type'] = self::MEMBERABLE_TYPE;
        $prepareData['memberable_id'] = $outsideCompanyMember->id;
        $prepareData['type'] = self::TYPE;

        $this->teamMemberRepository->create($prepareData);
    }

    /**
     * @return string[]
     */
    public function getForm(): array
    {
        return [
            self::FIRST_NAME => ["required", 'min:3'],
            self::LAST_NAME => ["required", 'min:3'],
            self::EMAIL => ["required", 'email'],
            self::PHONE => ["required"],
        ];

    }
}
