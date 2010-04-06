include FileUtils

BASE_FOLDER = File.expand_path(File.dirname(__FILE__))
BUILD = File.join(BASE_FOLDER, "build")
PUBLIC = File.join(BASE_FOLDER, "public")
TEMPLATES = File.join(BASE_FOLDER, "templates")

task :build do
  cd BASE_FOLDER
  rm_rf BUILD
  mkdir_p BUILD
  
  # copy assets
  cd PUBLIC
  cp_r "static", BUILD
  
  # get list of templates to process
  cd TEMPLATES
  templates = Dir["**/*"].delete_if { |p| not p =~ /\.html$/ }
  
  cd BUILD
  mkdirs = templates.map { |t| File.dirname(t) }.uniq
  mkdir_p(mkdirs)
  
  cd BASE_FOLDER
  templates.each do |path|
    sh "php #{PUBLIC}/index.php #{path} > #{BUILD}/#{path}"
  end
end

task :default => :build

