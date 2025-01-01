<?php

namespace App\Console\Commands;

use App\Models\SiteTheme;

class CreateSiteTheme extends WisenShopCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisenshop:create-site-theme {--name= : The name of the theme} {--identifier= : An unique identifier of the theme} {--description= : The description of the theme}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new site theme in a system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');

        if (!$name) {
            $this->showConsoleHeadingError('The --name option is required while creating a theme');
            return 1;
        }

        $identifier = $this->option('identifier');

        if (!$identifier)
            $identifier = $this->toSnakeCase($name);

        if (SiteTheme::where('identifier', $identifier)->exists()) {
            $this->showConsoleHeadingError('Site theme with identifier ['. $identifier . '] already exists in a system.');
            return 1;
        }

        $site_theme = new SiteTheme();
        $site_theme->name = $name;
        $site_theme->identifier = $identifier;
        $site_theme->description = $this->option('description') ?? null;
        $site_theme->save();

        // Display message after completion
        $this->messageAlignedBig('[' . $name . '] is added as site theme.');
    }
}
