<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaAppVersionManager\Nova;

use App\Nova\Resource;
use Illuminate\Http\Request;
use KirschbaumDevelopment\Nova\InlineSelect;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaInlineTextField\InlineText;
use Wame\LaravelAppVersionManager\Enums\VersionStatus;
use Wame\LaravelAppVersionManager\Models\AppVersion as AppVersionModel;

class AppVersion extends Resource
{
    public static string $model = AppVersionModel::class;

    public static $title = 'title';

    public static $search = [
        'title',
    ];

    public static function singularLabel(): string
    {
        $self = new self();

        return $self->translate(key: 'singular');
    }

    public static function label(): string
    {
        $self = new self();

        return $self->translate(key: 'label');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make(name: '', attribute: 'id')
                ->onlyOnForms(),

            InlineText::make(name: $this->translate(key: 'field.title'), attribute: 'title'),

//            InlineSelect::make(name: $this->translate(key: 'field.status'), attribute: 'status_db')
//                ->options(fn () => AppVersionModel::allStatuses())
//                ->default(fn () => VersionStatus::CURRENT->toDB())
//                ->inlineOnIndex()
//                ->enableOneStepOnIndex(),

            Select::make(name: $this->translate(key: 'field.status'), attribute: 'status_db')
                ->options(fn () => AppVersionModel::allStatuses())
                ->displayUsingLabels()
                ->default(fn () => VersionStatus::CURRENT->toDB()),

            DateTime::make(name: $this->translate(key: 'field.created_at'), attribute: 'created_at')
                ->sortable()
                ->filterable()
                ->exceptOnForms(),

            DateTime::make(name: $this->translate(key: 'field.updated_at'), attribute: 'updated_at')
                ->sortable()
                ->filterable()
                ->exceptOnForms(),
        ];
    }

    public static function createButtonLabel(): string
    {
        $self = new self();

        return $self->translate(key: 'button.create');
    }

//    public function authorizedToUpdate(Request $request): bool
//    {
//        return false;
//    }

    private function translate(
        string $key
    ): string {
        return __(key: "laravel-nova-app-version-manager::app_version.{$key}");
    }
}
